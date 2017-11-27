<?php

class CollectionTest extends \PHPUnit_Framework_TestCase
{
	/** @test */
	public function empty_istantiated_collection_return_empty()
	{
		$collection = new \App\ETL\Collection;

		$this->assertEmpty($collection->get());
	}

	/** @test */
	public function count_correct_on_passing_items_to_collection()
	{
		$collection = new \App\ETL\Collection([1, 2, 3]);

		$this->assertEquals(3, $collection->count());
	}

	/** @test */
	public function items_returned_matches_items_passing_into_collection()
	{
		$collection = new \App\ETL\Collection([1, 2, 3, 4]);

		$this->assertCount(4, $collection->get());

		$this->assertEquals(1, $collection->get()[0]);
		$this->assertEquals(2, $collection->get()[1]);
		$this->assertEquals(3, $collection->get()[2]);
		$this->assertEquals(4, $collection->get()[3]);
	}

	/** @test */
	public function collection_is_instance_of_iterator_aggregate()
	{
		$collection = new \App\ETL\Collection;

		$this->assertInstanceOf(IteratorAggregate::class, $collection);
	}

	/** @test */
	public function collection_can_be_iterated()
	{
		$collection = new \App\ETL\Collection([1, 2]);

		$items = [];
		foreach ($collection as $item) {
			$items[] = $item;
		}

		$this->assertCount(2, $items);
		$this->assertInstanceOf(ArrayIterator::class, $collection->getIterator());
	}

	/** @test */
	public function collection_can_be_merged()
	{
		$collection1 = new \App\ETL\Collection([1, 2]);
		$collection2 = new \App\ETL\Collection([3, 4]);

		$collection1->merge($collection2);

		$this->assertCount(4, $collection1->get());
		$this->assertEquals(1, $collection1->get()[0]);
		$this->assertEquals(2, $collection1->get()[1]);
		$this->assertEquals(3, $collection1->get()[2]);
		$this->assertEquals(4, $collection1->get()[3]);
	}

	/** @test */
	public function can_add_itesm_to_collection()
	{
		$collection = new \App\ETL\Collection([1, 2]);
		$collection->add([3, 4]);

		$this->assertEquals(4, $collection->count());
		$this->assertCount(4, $collection->get());
	}

	/** @test */
	public function return_json_encoded_items()
	{
		$collection = new \App\ETL\Collection(
			[
				['invoice' => '#333'],
				['invoice' => '#444']
			]
		);

		$this->assertInternalType('string', $collection->toJson());
		$this->assertEquals('[{"invoice":"#333"},{"invoice":"#444"}]', $collection->toJson());
	}

	/** @test */
	public function collection_json_encoded_returns_json()
	{
		$collection = new \App\ETL\Collection(
			[
				['invoice' => '#333'],
				['invoice' => '#444']
			]
		);
		$json = json_encode($collection);

		$this->assertInternalType('string', $json);
		$this->assertEquals('[{"invoice":"#333"},{"invoice":"#444"}]', $json);
	}
}	