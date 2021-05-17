<?php


class Role {

    private ?int $id;
    private ?string $title;

    /**
     * Role constructor.
     * @param int|null $id
     * @param string $title
     */
    public function __construct(?int $id, string $title) {
        $this->id = $id;
        $this->title = $title;
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
    }

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }


}