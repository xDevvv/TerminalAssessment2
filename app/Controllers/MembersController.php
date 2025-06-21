<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MembersModel;

class MembersController extends BaseController
{
    public function deleteMembers($id)
    {
        try {
            
            $members = new MembersModel();

            $members->where('member_id', $id)->delete();
            return redirect()->to('/members')->with('confirm', 'Successfully Deleted!');

        } catch (\Exception $e) {

            return redirect()->to('/members')->with('error', 'Members trying to delete have borrowed a Book!');
        }
        
    }

    public function editMembers($id) {

        $memberList = new MembersModel();

        $data['members'] = $memberList->where('member_id', $id)->first();
        $data['title_page'] = 'Update Member Details';
        
        return view('layout/member/editMembers', $data);
        
    }
}
