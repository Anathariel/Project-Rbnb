<?php

class Payment
{
    private $paymentId;
    private $uid;
    private $reservationId;
    private $paymentAmount;
    private $paymentDate;
    private $paymentstatus;

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
    public function getPaymentId ()
    {
        return $this->paymentId ;
    }

    public function getUid()
    {
        return $this->uid;
    }

    public function getReservationId()
    {
        return $this->reservationId;
    }

    public function getPaymentAmount()
    {
        return $this->paymentAmount;
    }

    public function getPaymentDate()
    {
        return $this->paymentDate;
    }

    public function getPaymentstatus()
    {
        return $this->paymentstatus;
    }

    //SETTERS
    public function setPaymentId(int $paymentId)
    {
        $this->paymentId = $paymentId;
    }

    public function setUid(int $uid)
    {
        $this->uid = $uid;
    }

    public function setReservationId(int $reservationId)
    {
        $this->reservationId = $reservationId;
    }

    public function setPaymentAmount(string $paymentAmount)
    {
        $this->paymentAmount = $paymentAmount;
    }

    public function setPaymentDate(string $paymentDate)
    {
        $this->paymentDate = $paymentDate;
    }

    public function setPaymentstatus(string $paymentstatus)
    {
        $this->paymentstatus = $paymentstatus;
    }
}
