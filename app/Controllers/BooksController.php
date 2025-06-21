<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BooksModel;
use App\Models\BorrowedBooksModel;
use App\Models\ReturnedBooksModel;
use PhpParser\Node\Stmt\TryCatch;

class BooksController extends BaseController
{
    public function deleteBook($id)
    {
        // if(!session()->get('name')) {
        //     return redirect()->to('/');
        // }
        
        $bookList = new BooksModel();

        $bookList->where('book_id', $id)->delete();

        return redirect()->to('/books')->with('confirm', 'Successfully Deleted!');
    }

    public function editBook($id)
    {
        $bookList = new BooksModel();

        $data['books'] = $bookList->where('book_id', $id)->first();
        $data['title_page'] = 'Edit Book';

        return view('layout/book/editBooks', $data);
    }



    public function setBorrowBookInfomraton($id)
    {
        // if(!session()->get('name')) {
        //     return redirect()->to('/');
        // }

        $bookList = new BooksModel();

        $data['books'] = $bookList->where('book_id', $id)->first();
        $data['title_page'] = 'Borrow Book';

        return view('layout/book/borrowBookInformation', $data);
    }

    public function borrowBook()
    {
        // if(!session()->get('name')) {
        //     return redirect()->to('/');
        // }

        $borrowedBooksModel = new BorrowedBooksModel();

        $db = \Config\Database::connect();
        try {
            $db->table('members')->where('member_id', $this->request->getPost('memberId'))->get()->getRow();
            $date = date('Y-m-d');
            $returnDate = date("Y-m-d", strtotime("+7 days"));

            $data = array(
                'book_id' => $this->request->getPost('bookId'),
                'member_id' => $this->request->getPost('memberId'),
                'borrowed_date' => $date,
                'book_return' => $returnDate
            );

            $borrowedBooksModel->insert($data);
            return redirect()->to('/home')->with('confirm', 'Successfully Borrow!');
            
        } catch (\Exception $e) {
            return redirect()->to('/home')->with('confirm', 'Invalid Member ID!');
        }
    }

    public function returnBook($id)
    {   
        // if(!session()->get('name')) {
        //     return redirect()->to('/');
        // }

        $db = \Config\Database::connect();


        $borrowedBooks = new BorrowedBooksModel();
        $returnBook = new ReturnedBooksModel();

        $returnBookData = $db->table('borrowbookrecords')->where('borrow_id', $id)->get()->getRow();
        $dateNow = date('Y-m-d');

        $data = array(
            'book_id' => $returnBookData->book_id,
            'member_id' => $returnBookData->member_id,
            'return_date' => $dateNow,
        );

        $returnBook->insert($data);

        $borrowedBooks->where('borrow_id', $id)->delete();

        return redirect()->to('/borrowed')->with('confirm', 'Successfully Returned!');
    }



    // User Functionality

    public function userBorrowedBooks($id) {
        // if(!session()->get('name')) {
        //     return redirect()->to('/');
        // }

        $borrowedBooksModel = new BorrowedBooksModel();

        $db = \Config\Database::connect();
        try {
            

            $date = date('Y-m-d');
            $returnDate = date("Y-m-d", strtotime("+7 days"));

            $data = array(
                'book_id' => $id,
                'user_id' => session()->get('id'),
                'borrowed_date' => $date,
                'book_return' => $returnDate
            );

            $borrowedBooksModel->insert($data);
            return redirect()->to('/available')->with('confirm', 'Successfully Borrow!');
            
        } catch (\Exception $e) {
            return redirect()->to('/available')->with('confirm', 'Invalid Member ID!');
        }
    }

    
}
