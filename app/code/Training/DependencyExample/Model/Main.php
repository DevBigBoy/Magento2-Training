<?php

namespace Training\DependencyExample\Model;

use Training\DependencyExample\Api\InjectableInterface;
use Training\DependencyExample\Api\NonInjectableInterfaceFactory;
use Training\DependencyExample\Model\VirtualType\DefaultName;

class Main
{
    private array $data;
    private InjectableInterface $injectable;
    private NonInjectableInterfaceFactory $nonInjectableFactory;
    private AbstractUtil $util;
    private HeavyOperation $heavyOperation;
    private DefaultName $defaultName;
    private ?Optional $optional;

    public function __construct(
        InjectableInterface $injectable,
        NonInjectableInterfaceFactory $nonInjectableFactory,
        AbstractUtil $util,
        HeavyOperation $heavyOperation,
        DefaultName $defaultName,
        Optional $optional = null,
        array $data = []
    )
    {
        $this->data = $data;
        $this->injectable = $injectable;
        $this->nonInjectableFactory = $nonInjectableFactory;
        $this->util = $util;
        $this->heavyOperation = $heavyOperation;
        $this->defaultName = $defaultName;
        $this->optional = $optional;
    }

    public function getId(): string
    {
        return $this->data['id'];
    }

    public function getInjectable(): Injectable
    {
        return $this->injectable;
    }

    public function getNonInjectable(): NonInjectable
    {
        return $this->nonInjectableFactory->create();
    }

    public function getUtil(): AbstractUtil
    {
        return $this->util;
    }

    public function getHeavyOperation(): HeavyOperation
    {
        return $this->heavyOperation;
    }

   public function getDefaultName(): DefaultName
   {
       return $this->defaultName;
   }

   public function getOptional(): ?Optional
   {
       return $this->optional;
   }
}
