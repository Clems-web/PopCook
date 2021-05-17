<?php



class Recette {

    private ?int $id;
    private ?string $title;
    private ?string $content;
    private ?string $category;
    private ?int $user_fk;

    /**
     * Recette constructor.
     * @param int|null $id
     * @param string $title
     * @param string $content
     * @param string $category
     * @param int|null $user_fk
     */
    public function __construct(?int $id, string $title ,string $content, string $category, ?int $user_fk) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->category = $category;
        $this->user_fk = $user_fk;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }


    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }/**
 * @param string|null $title
 */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }


    /**
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param string|null $content
     */
    public function setContent(?string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }

    /**
     * @param string|null $category
     */
    public function setCategory(?string $category): void
    {
        $this->category = $category;
    }


    /**
     * @return int|null
     */
    public function getUserFk(): ?int
    {
        return $this->user_fk;
    }

    /**
     * @param int|null $user_fk
     */
    public function setUserFk(?int $user_fk): void
    {
        $this->user_fk = $user_fk;
    }


}