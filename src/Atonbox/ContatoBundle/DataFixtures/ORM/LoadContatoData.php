<?php

namespace Atonbox\ContatoBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Atonbox\ContatoBundle\Entity\Contato;

class LoadContatorData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        
                
        for ($i = 0; $i < 200; $i++)
        {        
            $contato = new Contato();
            $contato->setNumSeq($i);
            $contato->setNome('Nome de Teste Muito Grande de Exemplo '.$i);            
            $manager->persist($contato);                                
        }
        
        
        
        $manager->flush();
    }
}


?>
