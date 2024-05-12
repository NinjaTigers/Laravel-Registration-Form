<?php

namespace Tests\Unit;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use App\Http\Controllers\UserController;

class ImageUploadUnitTest extends TestCase
{
    /**
     * Test Testing Image Upload Method in the UserController
     *
     * @return void
     */
    public function testImageUpload()
    {
        try {
            // Mock a file upload

            $file = new UploadedFile(storage_path("app\public\sample_image.jpg"), "sample_image.jpg");

            // Create a new instance of the ImageController
            $controller = new UserController();

            // Mock a request with the file
            $request = $this->getMockBuilder(Request::class)
                ->getMock();
            $request->expects($this->once())
                ->method('file')
                ->with('image')
                ->willReturn($file);

            // Mock the Storage facade
//            Storage::fake();

            // Call the store method on the controller with the mocked request
            $path = $controller->store($request);

            // Assert that the file was stored in the expected path
            $this->assertTrue(
                Storage::exists($path),
                "Image Upload Successful"
            );
        } catch (Exception $e) {
            // Catch any exception that occurs during the test
            $this->fail('Exception caught: ' . $e->getMessage());
        }
    }
}

