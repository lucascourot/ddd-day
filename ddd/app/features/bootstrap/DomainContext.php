<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;

class DomainContext implements Context, SnippetAcceptingContext
{
    /**
     * @var \Domain\User\AnonymousUser
     */
    private $anonymousUser;

    /**
     * @var \Domain\User\RegisteredUser
     */
    private $registeredUser;


    private $post;

    public function __construct()
    {
    }

    /**
     * @Given I am an anonymous user
     */
    public function iAmAnAnonymousUser()
    {
        $this->anonymousUser = \Domain\User\AnonymousUser::connect();
    }

    /**
     * @When I register with valid info
     */
    public function iRegisterWithValidInfo()
    {
        $this->registeredUser = \Domain\User\RegisteredUser::registerFromAnonymous(
            \Domain\User\RegisteredUserId::generate(),
            $this->anonymousUser,
            'lucas',
            'password'
        );
    }

    /**
     * @Then I should be registered and logged in
     */
    public function iShouldBeRegisteredAndLoggedIn()
    {
        PHPUnit_Framework_Assert::assertSame('lucas', $this->registeredUser->getUsername());
    }

    /**
     * @When I post a new comment
     */
    public function iPostANewComment()
    {
        $this->post = new \Domain\Post\Post(
            \Domain\Post\PostId::generate()
        );

        $this->comment = new \Domain\Comment\Comment(
            \Domain\Comment\CommentId::generate(),
            \Domain\Comment\Author::named('lucas'),
            'message'
        );

        $this->post->comment($this->comment);
    }

    /**
     * @Then I should see my comment on the post
     */
    public function iShouldSeeMyCommentOnThePost()
    {
        PHPUnit_Framework_Assert::assertCount(1, $this->post->getComments());
    }

    /**
     * @Given I am a registered user
     */
    public function iAmARegisteredUser()
    {
        $this->registeredUser = \Domain\User\RegisteredUser::fromUsername(\Domain\User\RegisteredUserId::generate(), 'lucas');
    }
}
