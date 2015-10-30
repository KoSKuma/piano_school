<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase;

Class ScheduleTest extends TestCase 
{
	public function testGetTeacherSchedule() {
		$schedule = Schedule::getTeacherSchedule();

		$this->assertEquals($schedule->student_nickname,$schedule);
	}
}