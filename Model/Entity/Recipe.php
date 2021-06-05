<?php



class Recipe {

    private ?int $id;
    private ?string $title;
    private ?string $art;
    private ?string $ingredient;
    private ?string $preparation;
    private ?string $category;
    private ?int $user_fk;

    /**
     * Recipe constructor.
     * @param int|null $id
     * @param string $title
     * @param string $art
     * @param string $ingredient
     * @param string $preparation
     * @param string $category
     * @param int|null $user_fk
     */
    public function __construct(?int $id, string $title, string $art, string $ingredient,string $preparation, string $category, ?int $user_fk) {
        $this->id = $id;
        $this->title = $title;
        $this->art = $art;
        $this->ingredient = $ingredient;
        $this->preparation = $preparation;
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
        return str_replace('\\','', $this->title);
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
    public function getArt(): ?string
    {
        return str_replace('\\','', $this->art);
    }

    /**
     * @param string|null $art
     */
    public function setArt(string $art): void
    {
        $this->art = $art;
    }

    /**
     * @return string|null
     */
    public function getIngredient(): ?string
    {
        return str_replace('\\','', $this->ingredient);
    }

    /**
     * @param string|null $ingredient
     */
    public function setIngredient(?string $ingredient): void
    {
        $this->ingredient = $ingredient;
    }

    /**
     * @return string|null
     */
    public function getPreparation(): ?string
    {
        return str_replace('\\','', $this->preparation);
    }

    /**
     * @param string|null $preparation
     */
    public function setPreparation(?string $preparation): void
    {
        $this->preparation = $preparation;
    }

    /**
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return str_replace('\\','', $this->category);
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