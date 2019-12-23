<?php


namespace App\Repositories;


use App\customer;


class CustomerRepository
{

    public function get_all(){
        // if you dont want to use the ORM in future the below code will no use if you are using it in controller
        //Method 1
//        return customer::orderBy('name')
//            ->where('active',1)
//            ->with('user')
//            ->get()
//            ->map(function($customer){
//                return $this->format_data($customer);
//            });


        //Method 2 Using custom function from models
        return customer::orderBy('name')
            ->where('active',1)
            ->with('user')
            ->get()
            ->map->format_from_model();

    }

    public function findById($customerId)
    {
//        Method 1
//        $customer = customer::where('id',$customerId)->where('active',1)->with('user')->firstOrFail();
//        return $this->format_data($customer);

//        Method 2
        return customer::where('id',$customerId)
            ->where('active',1)
            ->with('user')
            ->firstOrFail()
            ->format_from_model();
    }


    public function format_data($customer)
    {
        return [
            'customer_id' => $customer->id,
            'name' => $customer->name,
            'created_by' => $customer->user->email,
            'last_updated' => $customer->updated_at->diffForHumans()
        ];
    }

    public function update($customerId){
        $customer = customer::where('id',$customerId)->firstOrFail();

        $customer->update(request()->only('name'));
    }

    public function delete($customerId){
        $cusomer = customer::where('id',$customerId)->delete();
    }
}
