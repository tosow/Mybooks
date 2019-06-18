<?php
namespace MyBooks\Domain;

Class Book
{
    /**
     * Book id.
     *
     * @var integer
     */
    private  $book_id ;
	/**
     * Book title.
     *
     * @var string
     */
    private  $book_title ;
	/**
     * Book isbn.
     *
     * @var string
     */
    private $book_isbn ;
	/**
     * Book summary.
     *
     * @var string
     */
    private $book_summary;
	    /**
     * Book author.
     *
     * @var \MyBooks\Domain\Author
     */
    private $author;

	public function getBook_id()
	{
	   return $this->book_id;
	} 
	public function setBook_id ($book_id)
	{
	   $this->book_id=$book_id;
	   return $this;
	} 
    public function getBook_title()
	{
	    return $this->book_title;
	} 
	public function setBook_title ($book_title)
	{
	    $this->book_title=$book_title;
		return $this;
	} 
	public function getBook_isbn ()
	{
	    return $this->book_isbn;
	} 
	public function setBook_isbn ($book_isbn)
	{
	   $this->book_isbn=$book_isbn;
	   return $this;
	} 
	public function getBook_summary()
	{
	    return $this->book_summary;
	} 
	public function setBook_summary ($book_summary)
	{
	    $this->book_summary=$book_summary;
		return $this;
	}  
	/**
     * Returns author.
     *
     * @return MyBooks\Domain\Author
     */
    public function getAuthor()
    {
        return $this->author;
    }
    
    /**
     * Set author.
     *
     * @param \MyBooks\Domain\Author $author
     */
    public function setAuthor(Author $author)
    {
        $this->author = $author;
    }
}


