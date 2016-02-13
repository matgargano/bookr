<?php

class TestCase extends Laravel\Lumen\Testing\TestCase {
	/**
	 * Creates the application.
	 *
	 * @return \Laravel\Lumen\Application
	 */
	public function createApplication() {
		return require __DIR__ . '/../bootstrap/app.php';
	}

	public function seeHasHeader( $header ) {
		$this->assertTrue(
			$this->response->headers->has( $header ),
			sprintf( 'Response should have the header {%}s but does not', $header )

		);

		return $this;
	}

	public function seeHeaderWithRegexp( $header, $regexp ) {

		$this->seeHasHeader( $header )
		     ->assertRegexp( $regexp,
			     $this->response->headers->get( $header )
		     );

		return $this;

	}

}
