<?php

class Invoice
{
    private $invoiceId;
    private $uid;
    private $reservationId;
    private $amount;
    private $billingDate;
    private $dueDate;
    private $status;

    public function __construct(array $post)
    {
        $this->hydrate($post);
    }

    private function hydrate(array $post)
    {
        foreach ($post as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    //GETTERS
    public function getInvoiceId()
    {
        return $this->invoiceId;
    }

    public function getUid()
    {
        return $this->uid;
    }

    public function getReservationId()
    {
        return $this->reservationId;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getBillingDate()
    {
        return $this->billingDate;
    }

    public function getDueDate()
    {
        return $this->dueDate;
    }

    public function getStatus()
    {
        return $this->status;
    }

    //SETTERS
    public function setInvoiceId(int $invoiceId)
    {
        $this->invoiceId = $invoiceId;
    }

    public function setUid(int $uid)
    {
        $this->uid = $uid;
    }

    public function setReservationId(int $reservationId)
    {
        $this->reservationId = $reservationId;
    }

    public function setAmount(string $amount)
    {
        $this->amount = $amount;
    }

    public function setBillingDate(string $billingDate)
    {
        $this->billingDate = $billingDate;
    }

    public function setDueDate(string $dueDate)
    {
        $this->dueDate = $dueDate;
    }

    public function setStatus(string $status)
    {
        $this->status = $status;
    }
}
