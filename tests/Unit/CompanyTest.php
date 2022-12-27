<?php

namespace Tests\Unit;


use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\Request;
use PHPUnit\Framework\TestCase;

class CompanyTest extends TestCase
{
    use DatabaseMigrations;

    public function testCompanyFormValidation()
    {
        $request = new Request([
            'name' => '',
            'email' => 'invalid',
            'website' => 'invalid',
            'logo' => ''
        ]);

        $response = $this->post('companies', $request->all());

        $response->assertSessionHasErrors(['name', 'email', 'website', 'logo']);
        $response->assertStatus(302);
    }
}
