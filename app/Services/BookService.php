<?php

namespace App\Services;

use App\Models\Book;
use App\Services\Interfaces\BookServiceInterface;

class BookService implements BookServiceInterface
{

    public function bookListing($dataTableParams)
    {
        $offset = ($dataTableParams->page - 1) * $dataTableParams->rowsPerPage;
        $limit = $dataTableParams->rowsPerPage;
        $books = Book::orderBy($dataTableParams->sortBy, $dataTableParams->sortType);
        $searchfilterColumns = ['title', 'author', 'isbn', 'date', 'published_on', 'genre'];

        foreach ($searchfilterColumns as $filterColumn) {
            if (!empty($dataTableParams->search[$filterColumn])) {
                $books->where($filterColumn, 'LIKE', '%' . $dataTableParams->search[$filterColumn] . '%');
            }
        }
        $count = $books->count();
        $books = $books->offset($offset)->limit($limit)->get();
        $data = ['records' => $books, 'recordsTotal' => $count];
        return $data;
    }

    public function find($id)
    {
        return Book::find($id);
    }

    public function create($data)
    {
        Book::create($data);
    }

    public function update($id, $data)
    {
        Book::whereId($id)->update($data);
    }

    public function delete($id)
    {
        Book::whereId($id)->delete();
    }
}
