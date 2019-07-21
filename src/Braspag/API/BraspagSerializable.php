<?php
namespace BraspagPagador\API;

interface BraspagSerializable extends \JsonSerializable
{
    public function populate(\stdClass $data);
}