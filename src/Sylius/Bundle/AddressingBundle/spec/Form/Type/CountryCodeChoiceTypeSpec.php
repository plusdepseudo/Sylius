<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Sylius\Bundle\AddressingBundle\Form\Type;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sylius\Bundle\AddressingBundle\Form\Type\CountryChoiceType;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author Jan Góralski <jan.goralski@lakion.com>
 */
class CountryCodeChoiceTypeSpec extends ObjectBehavior
{
    function let(RepositoryInterface $repository)
    {
        $this->beConstructedWith($repository);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Sylius\Bundle\AddressingBundle\Form\Type\CountryCodeChoiceType');
    }

    function it_extends_country_choice_type()
    {
        $this->shouldHaveType(CountryChoiceType::class);
    }

    function it_has_a_valid_name()
    {
        $this->getName()->shouldReturn('sylius_country_code_choice');
    }

    function it_configures_options(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefault('choice_list', null)->shouldBeCalled();
        $resolver->setDefault('choices', Argument::type('callable'))->shouldBeCalled();
    }
}
