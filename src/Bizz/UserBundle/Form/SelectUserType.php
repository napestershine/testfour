<?php
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CreateVehicleStep2Form extends AbstractType {

public function buildForm(FormBuilderInterface $builder, array $options) {
$builder->add('engine', 'MyCompany\MyBundle\Form\Type\VehicleEngineType', array(
'placeholder' => '',
));
}

public function getBlockPrefix() {
return 'createVehicleStep2';
}

}