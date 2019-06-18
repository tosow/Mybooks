<?php
namespace MyBooks\DAO;

use MyBooks\Domain\Author;

class AuthorDAO extends DAO
{
    
	  /**
     * Return a list of all authors, sorted by date (most recent first).
     *
     * @return array A list of all authors.
     */
    public function findAllauthor() {
        $sql = "select * from  author order by auth_id desc";
        $result = $this->getDb()->fetchAll($sql);

        
        // Convert query result to an array of domain objects
        $authors = array();
        foreach ($result as $row) {
            $authId = $row['auth_id'];
            $authors[$authId] = $this->buildDomainObject($row);
        }
        return $authors;
    }

    /**
     * Returns an author matching the supplied auth_id.
     *
     * @param integer $auth_id
     *
     * @return \MyBooks\Domain\Author|throws an exception if no matching author is found
     */
    public function findAuthorById($auth_id) {
        $sql = "select * from author where auth_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($auth_id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No author matching auth_id " . $auth_id);
    }

    /**
     * Creates an Authors object based on a DB row.
     *
     * @param array $row The DB row containing Author data.
     * @return \MyBooks\Domain\Author
     */
    protected function  buildDomainObject(array $row) {
        $author = new Author();
        $author->setAuth_Id($row['auth_id']);
        $author->setAuth_First_Name($row['auth_first_name']);
        $author->setAuth_Last_Name($row['auth_last_name']);
        return $author;
    }
}
	