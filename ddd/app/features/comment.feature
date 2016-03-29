@domain
Feature: Comment management
  In order to comment posts
  As a reader
  I need to post my comment

  Scenario: Post a new comment as anonymous
    Given I am an anonymous user
    When I post a new comment
    Then I should see my comment on the post

  Scenario: Post a new comment as a registered user
    Given I am a registered user
    When I post a new comment
    Then I should see my comment on the post
