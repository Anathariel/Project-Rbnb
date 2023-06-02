<?php

class CancellationPolicy
{
    private $cancellationPolicyId ;
    private $propertyId;
    private $cancellationTime;
    private $refundPolicy;
    private $cancellationFees;

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
    public function getCancellationPolicyId()
    {
        return $this->cancellationPolicyId;
    }

    public function getPropertyId()
    {
        return $this->propertyId;
    }

    public function getCancellationTime()
    {
        return $this->cancellationTime;
    }

    public function getRefundPolicy()
    {
        return $this->refundPolicy;
    }

    public function getCancellationFees()
    {
        return $this->cancellationFees;
    }

    //SETTERS
    public function setCancellationPolicyId(int $cancellationPolicyId)
    {
        $this->cancellationPolicyId = $cancellationPolicyId;
    }

    public function setPropertyId(int $propertyId)
    {
        $this->propertyId = $propertyId;
    }

    public function setCancellationTime(int $cancellationTime)
    {
        $this->cancellationTime = $cancellationTime;
    }

    public function setRefundPolicy(string $refundPolicy)
    {
        $this->refundPolicy = $refundPolicy;
    }

    public function setCancellationFees(string $cancellationFees)
    {
        $this->cancellationFees = $cancellationFees;
    }
}
