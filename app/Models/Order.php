<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\payment;
use App\Models\services;

class Order extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id',
        'fran_id',
        'service_id',
        'working_status',
        'form_submitted',
        'payment_mode',
        'payment_id',
        'lead_id',
        'status',
        'created_at',
        'updated_at',
    ];

    public $appends = ["doc", "pdf", "reciept", "form_status", "form_status_phrase"];


    public function service()
    {
        return $this->hasOne(services::class, 'id', 'service_id');
    }

    public function lead()
    {
        return $this->hasOne(Lead::class, 'id', 'lead_id');
    }

    public function payment()
    {
        return $this->hasOne(payment::class, 'r_payment_id', 'payment_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function fran()
    {
        return $this->hasOne(User::class, 'id', 'fran_id');
    }

    public function assign()
    {
        return $this->hasMany(assigned::class, "order_id", "id");
    }

    public function getDocAttribute()
    {
        return route("user.download.customer", ["id" => $this->id]);
    }
    public function getPdfAttribute()
    {
        return route("user.download.invoice", ["id" => $this->id]);
    }

    public function getRecieptAttribute()
    {
        return route("download.reciept", ["id" => $this->id]);
    }

    public function getFormStatusAttribute()
    {
        $status = "";

        switch ($this->form_submitted) {
            case '0':
                $status = "Not Assigned";
                break;
            case '5':
                $status = "Assigned";
                break;
            case '1':
                $status = "Pending";
                break;
            case '2':
                $status = "In Process";
                break;
            case '3':
                $status = "Reassigned";
                break;
        }

        return $status;
    }
    public function getFormStatusPhraseAttribute()
    {
        $response = "";

        switch ($this->form_submitted) {
            case '0':
                $response = "Form has not assigned";
                break;
            case '5':
                $response = "Assigned";
                break;
            case '1':
                $response = "Your form has been submitted";
                break;
            case '2':
                $response = "Form status is in process";
                break;
            case '3':
                $response = "Reassigned";
                break;
        }

        return $response;
    }
}
