<?php

namespace Tests\Unit;

use App\Helpers\CsvProductsHelper;
use App\Services\ProductService;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

class CsvProductsHelperTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testGetCollectionMethod()
    {
        $request = $this->getRequest();
        $getCollection = self::getMethod('getCollection');
        $csv_products_helper = new CsvProductsHelper(resolve(ProductService::class));
        $result = $getCollection->invokeArgs($csv_products_helper, [$request]);
        $this->assertEquals($result->first()['name'], 'ashimashi');
        $this->assertCount(4, $result);
    }

    public function testSuccessSave()
    {
        DB::shouldReceive("transaction")
            ->andReturnTrue();
        $request = $this->getRequest();
        $csv_products_helper = new CsvProductsHelper(resolve(ProductService::class));
        $result = $csv_products_helper->save($request);
        $this->assertTrue($result);
    }

    private function getRequest()
    {
        return new class {
            public function file($name){
                return $this;
            }

            public function getRealPath()
            {
                return 'products.csv';
            }
        };
    }

    private static function getMethod($name)
    {
        $class = new ReflectionClass(CsvProductsHelper::class);
        $method = $class->getMethod($name);
        $method->setAccessible(true);

        return $method;
    }
}
