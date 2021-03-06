<?php

namespace Tests\Unit;

use App\Http\Repositories\CommentsRepository;
use App\Models\Event;
use App\Models\Medal;
use App\Models\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentsRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var mixed
     */
    private CommentsRepository $commentsRepository;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->commentsRepository = $this->app->make(CommentsRepository::class);
    }

    /**
     * Test create comments repository
     */
    public function testCreate_givenCorrectData_expectCommentCreated()
    {
        $event = Event::factory()->create();
        $data =  [
            'body' => 'Nice event! Will definitely join next year',
        ];

        $comment = $this->commentsRepository->create($event, $data);

        $assertEvent = $comment->commentable;

        $this->assertInstanceOf(Comment::class, $comment);
        $this->assertInstanceOf(Event::class, $assertEvent);
        $this->assertEquals($data['body'], $comment->body);
        $this->assertEquals($event->id, $assertEvent->id);
        $this->assertDatabaseHas('comments', $data);
    }

    /**
     * Test read comments repository
     */
    public function testGet_givenCorrectData_expectCommentsFetched()
    {
        $medal = Medal::factory()->create();

        $data = [
            'body' => 'Nice Medal Design',
        ];

        $medal->comments()->create($data);

        Comment::factory()->create();

        $comments = $this->commentsRepository->get($medal);
        $this->assertCount(1, $comments);

        $comment = $comments->first();
        $this->assertInstanceOf(Comment::class, $comment);
        $this->assertEquals($data['body'], $comment->body);
    }

    /**
     * Test update comments repository
     */
    public function testUpdate_givenCorrectData_expectCommentUpdated()
    {
        $updateData = [
            'body' => 'Very Organized event!',
        ];

        $comment = Comment::factory()->create();

        $updatedComment = $this->commentsRepository->update($comment, $updateData);

        $this->assertEquals($updateData['body'], $updatedComment->body);
        $this->assertInstanceOf(Comment::class, $comment);
    }

    /**
     * Test delete comments repository
     */
    public function testDelete_givenCorrectData_expectCommentDeleted()
    {
        $comment = $this->commentsRepository->delete(Comment::factory()->create());
        $this->assertInstanceOf(Comment::class, $comment);
        $this->assertSoftDeleted($comment);
    }
}
