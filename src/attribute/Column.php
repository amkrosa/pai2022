<?php

#[Attribute]
class Column
{
    public function __construct(private string $name, private ?string $references = null) {}
}