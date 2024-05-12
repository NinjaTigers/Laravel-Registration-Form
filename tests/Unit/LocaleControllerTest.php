<?php

namespace Tests\Unit;
use App\Http\Controllers\LocaleController;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class LocaleControllerTest extends TestCase
{
    /**
     * Test application behavior with English locale.
     *
     * @return void
     */
    public function testEnglishLocale()
    {
        $controller = new LocaleController();
        $resp2 = $controller->locale('en');

        self::assertTrue($resp2->isRedirect());

        $redirectedUrl = $resp2->headers->get('Location');

        // Make a request to the redirected URL
        $followedResponse = $this->get($redirectedUrl);


        // Assert that the response contains English content
        $followedResponse->assertStatus(200)
            ->assertSee('Registration Form'); // Example: English content identifier
    }

    /**
     * Test application behavior with Arabic locale.
     *
     * @return void
     */
    public function testArabicLocale()
    {
        $controller = new LocaleController();
        $resp2 = $controller->locale('ar');


        $redirectedUrl = $resp2->headers->get('Location');

        // Make a request to the redirected URL
        $followedResponse = $this->get($redirectedUrl);

        // Assert that the response contains Arabic content
        $followedResponse->assertStatus(200)
            ->assertSee('استمارة تسجيل'); // Example: Arabic content identifier
    }
}
