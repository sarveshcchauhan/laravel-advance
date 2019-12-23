<?php

namespace App\Repositories;

interface CustomerRepositoryInterface
{
    public function get_all();

    public function findById($customerId);

    public function format_data($customer);

    public function update($customerId);

    public function delete($customerId);
}
