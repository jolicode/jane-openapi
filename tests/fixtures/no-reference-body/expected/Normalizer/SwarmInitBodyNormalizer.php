<?php

namespace Joli\Jane\OpenApi\Tests\Expected\Normalizer;

use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class SwarmInitBodyNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'Joli\\Jane\\OpenApi\\Tests\\Expected\\Model\\SwarmInitBody') {
            return false;
        }

        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \Joli\Jane\OpenApi\Tests\Expected\Model\SwarmInitBody) {
            return true;
        }

        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (!is_object($data)) {
            throw new InvalidArgumentException();
        }
        $object = new \Joli\Jane\OpenApi\Tests\Expected\Model\SwarmInitBody();
        if (property_exists($data, 'ListenAddr')) {
            $object->setListenAddr($data->{'ListenAddr'});
        }
        if (property_exists($data, 'AdvertiseAddr')) {
            $object->setAdvertiseAddr($data->{'AdvertiseAddr'});
        }
        if (property_exists($data, 'ForceNewCluster')) {
            $object->setForceNewCluster($data->{'ForceNewCluster'});
        }
        if (property_exists($data, 'Spec')) {
            $object->setSpec($this->denormalizer->denormalize($data->{'Spec'}, 'Joli\\Jane\\OpenApi\\Tests\\Expected\\Model\\SwarmSpec', 'json', $context));
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = new \stdClass();
        if (null !== $object->getListenAddr()) {
            $data->{'ListenAddr'} = $object->getListenAddr();
        }
        if (null !== $object->getAdvertiseAddr()) {
            $data->{'AdvertiseAddr'} = $object->getAdvertiseAddr();
        }
        if (null !== $object->getForceNewCluster()) {
            $data->{'ForceNewCluster'} = $object->getForceNewCluster();
        }
        if (null !== $object->getSpec()) {
            $data->{'Spec'} = $this->normalizer->normalize($object->getSpec(), 'json', $context);
        }

        return $data;
    }
}
