<?php

#[Attribute]
class Table
{
    public function __construct(private string $name, private ?DatabaseView $view = null) {}
}