<?php

namespace MyBooks\DAO;

use MyBooks\Domain\Book;

class BookDAO extends DAO
{
     /**
     * @var \MyBooks\DAO\AuthorDAO
     */
    private $authorDAO;

    public function setAuthorDAO(AuthorDAO $authorDAO) {
        $this->authorDAO = $authorDAO;
    }

    /**
     * Return a list of all books, sorted by date (most recent first).
     *
     * @return array A list of all books.
     */
    public function findAllbook() {
        $sql = "select * from  book order by book_id desc";
        $result = $this->getDb()->fetchAll($sql);
        // Convert query result to an array of domain objects
        $books = array();
        foreach ($result as $row) {
            $bookId = $row['book_id'];
            $books[$bookId] = $this->buildDomainObject($row);
        }
        return $books;
    }
      /**
     * Returns an book matching the supplied book_id.
     *
     * @param integer $book_id
     *
     * @return \MyBooks\Domain\Book|throws an exception if no matching book is found
     */
    public function findbookById($book_id) {
        $sql = "select * from book where book_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($book_id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No author matching book_id " . $book_id);
    }


    /**
     * Creates an Book object based on a DB row.
     *
     * @param array $row The DB row containing Book data.
     * @return \MicroCMS\Domain\Book
     */
    protected function buildDomainObject(array $row) {
        $book = new Book();
        $book->setBook_id($row['book_id']);
        $book->setBook_title($row['book_title']);
        $book->setBook_isbn($row['book_isbn']);
		$book->setBook_summary($row['book_summary']);


       if (array_key_exists('auth_id', $row)) {
            // Find and set the associated 
            $authId = $row['auth_id'];
            $autheur = $this->authorDAO->findAuthorById($authId);
            $book->setAuthor($autheur);
        }
        return $book;
    }
     /**
     * Returns an author matching the supplied book_id.
     *
     * @param integer $book_id
     *
     * @return \MyBooks\Domain\Author|throws an exception if no matching author is found
     */

        public function findIdAByIdB($book_id) {
         $sql = "select auth_id  from book where book_id=?";
         $row = $this->getDb()->fetchAssoc($sql, array($book_id));
         $authId=$row['auth_id'];
         return $authId;
    }
}
?>