<?php

// Challenge: refactor these interfaces into a more sensible architecture (adding new interfaces where required)

interface FlightBookingSystemInterface
{
    public function getAllAirports();
    public function getPossibleDestinationAirportsForOriginAirport(AirportInterface $origin);
    public function getDepartureTimes(AirportInterface $origin, AirportInterface $destination);
    public function getFlightCost(AirportInterface $origin, AirportInterface $destination, UserInterface $user, $time);
    public function bookFlight(AirportInterface $origin, AirportInterface $destination, UserInterface $user, $time, $cost);
}

interface AirportInterface {}
interface UserInterface {}

