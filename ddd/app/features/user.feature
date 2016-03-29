@domain
Feature: User management
  In order to do advanced actions
  As a user
  I need to be registered

  Scenario: Register a new user
    Given I am an anonymous user
    When I register with valid info
    Then I should be registered and logged in
