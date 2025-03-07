<?php

namespace Tests\Unit;

use App\Services\ApplicantService;
use App\Repositories\ApplicantRepository;
use Mockery;
use Tests\TestCase;

class ApplicantServiceTest extends TestCase
{
    protected $applicantService;
    protected $applicantRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->applicantRepository = Mockery::mock(ApplicantRepository::class);
        $this->applicantService = new ApplicantService($this->applicantRepository);
    }

    public function test_get_all_applicants()
    {
        $applicants = [['id' => 1, 'name' => 'John Doe'], ['id' => 2, 'name' => 'Jane Doe']];
        $this->applicantRepository->shouldReceive('getAll')->once()->andReturn($applicants);

        $result = $this->applicantService->getAll();

        $this->assertEquals($applicants, $result);
    }

    public function test_find_applicant_by_id()
    {
        $applicant = ['id' => 1, 'name' => 'John Doe'];
        $this->applicantRepository->shouldReceive('findById')->with(1)->once()->andReturn($applicant);

        $result = $this->applicantService->findById(1);

        $this->assertEquals($applicant, $result);
    }

    public function test_create_applicant()
    {
        $data = ['name' => 'John Doe'];
        $this->applicantRepository->shouldReceive('create')->with($data)->once()->andReturn($data);

        $result = $this->applicantService->create($data);

        $this->assertEquals($data, $result);
    }

    public function test_update_applicant()
    {
        $data = ['name' => 'John Updated'];
        $this->applicantRepository->shouldReceive('update')->with(1, $data)->once()->andReturn(true);

        $result = $this->applicantService->update(1, $data);

        $this->assertTrue($result);
    }

    public function test_delete_applicant()
    {
        $this->applicantRepository->shouldReceive('delete')->with(1)->once()->andReturn(true);

        $result = $this->applicantService->delete(1);

        $this->assertTrue($result);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
