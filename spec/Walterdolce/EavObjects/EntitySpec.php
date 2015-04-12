<?php

namespace spec\Walterdolce\EavObjects;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EntitySpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('entity_identifier');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Walterdolce\EavObjects\Entity');
    }

    function it_is_an_entity()
    {
        $this->shouldHaveType('Walterdolce\EavObjects\EntityInterface');
    }

    function it_is_identified_by_a_custom_name_when_created_like_so()
    {
        $this->beConstructedWith('entity_identifier');
        $this->getIdentifier()->shouldBe('entity_identifier');
    }

    function it_is_identified_by_an_integer_when_created_like_so()
    {
        $this->beConstructedWith(0);
        $this->getIdentifier()->shouldBe(0);
    }

    function it_throws_an_exception_when_identified_by_a_boolean_false()
    {
        $this->shouldThrow('\InvalidArgumentException')
            ->during('__construct', [false]);
    }

    function it_throws_an_exception_when_identified_by_a_boolean_true()
    {
        $this->shouldThrow('\InvalidArgumentException')
            ->during('__construct', [true]);
    }

    function it_throws_an_exception_when_identified_by_an_object()
    {
        $this->shouldThrow('\InvalidArgumentException')
            ->during('__construct', [new \stdClass()]);
    }

    function it_throws_an_exception_when_identified_by_a_null_value()
    {
        $this->shouldThrow('\InvalidArgumentException')
            ->during('__construct', [null]);
    }

    function it_throws_an_exception_when_identified_by_an_array()
    {
        $this->shouldThrow('\InvalidArgumentException')
            ->during('__construct', [array()]);
    }

    function it_throws_an_exception_when_identified_by_a_resource()
    {
        $f = tmpfile();
        $this->shouldThrow('\InvalidArgumentException')
            ->during('__construct', [$f]);
        fclose($f);
    }

    function it_throws_an_exception_when_identified_by_an_empty_name()
    {
        $this->shouldThrow('\InvalidArgumentException')
            ->during('__construct', ['']);
    }
}
