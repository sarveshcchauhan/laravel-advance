<?php

namespace App\Http\Controllers;

use App\customer;
use App\Repositories\CustomerRepository;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private  $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function index(){
        $customers = $this->customerRepository->get_all();

        return $customers;
    }

    public  function  findById($id){
        $customers = $this->customerRepository->findById($id);

        return $customers;
    }

    public function update($id){
        $this->customerRepository->update($id);

        return redirect('/customers/'.$id);
    }

    public function delete($id){
        $this->customerRepository->delete($id);
        return redirect('/customers');
    }
}
