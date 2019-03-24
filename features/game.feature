Feature: Game
    Paying the game
    As a player
    I need to hit bees

    Scenario: Hiting a bee
        Given there is a "Queen"
        Then the lifespan should be 100
        When I hit her
        Then the lifespan should be 92
    
    Scenario: Hiting a bee
        Given there is a "Worker"
        Then the lifespan should be 75
        When I hit her
        Then the lifespan should be 65

    Scenario: Hiting a bee
        Given there is a "Drone"
        Then the lifespan should be 50
        When I hit her
        Then the lifespan should be 38