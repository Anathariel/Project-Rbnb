<?php
class CancellationPolicyModel extends Model
{
    public function getCancellationPolicyModel(int $propertyId)
    {
        $req = $this->getDb()->prepare('SELECT `cancellationTime`, `refundPolicy`, `cancellationFees` FROM `cancellationpolicy` WHERE `propertyId` = :propertyId');
        $req->bindParam('propertyId', $propertyId, PDO::PARAM_INT);
        $req->execute();

        $cancellationPolicyModelData = $req->fetch(PDO::FETCH_ASSOC);

        if (!$cancellationPolicyModelData) {
            // Gérer le cas où aucune commodité n'est trouvée pour la propriété spécifiée
            return null;
        }

        $cancellationPolicy = new CancellationPolicy($cancellationPolicyModelData);

        return $cancellationPolicy;
    }
}
