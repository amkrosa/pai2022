<?php

class CategoryRepository extends Repository
{
    private ?string $aId;
    private ?string $bId;
    private ?string $cId;

    public function __construct()
    {
        parent::__construct('Category', 'TaskCategory');
        $categories = $this->findAll();
        if (count($categories) == 0) {
            $a = Category::create('A');
            $b = Category::create('B');
            $c = Category::create('C');
            $this->aId = $this->save($a);
            $this->bId = $this->save($b);
            $this->cId = $this->save($c);
        } else {
            foreach ($categories as $category) {
                switch ($category->getName()) {
                    case "A":
                        $this->aId = $category->getId();
                        break;
                    case "B":
                        $this->bId = $category->getId();
                        break;
                    case "C":
                        $this->cId = $category->getId();
                        break;
                }
            }
        }
    }

    /**
     * @return mixed
     */
    public function getAId()
    {
        return $this->aId;
    }

    /**
     * @return mixed
     */
    public function getBId()
    {
        return $this->bId;
    }

    /**
     * @return mixed
     */
    public function getCId()
    {
        return $this->cId;
    }

    public function choose(string $category) {
        return match ($category) {
            "A" => $this->getAId(),
            "B" => $this->getBId(),
            "C" => $this->getCId(),
            default => null,
        };
    }
}