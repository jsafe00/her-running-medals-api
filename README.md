<a href="https://www.buymeacoffee.com/jsafe00" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/default-black.png" alt="Buy Me A Coffee" style="height: 51px !important;width: 217px !important;" ></a>

Her-Running-Medals is a collection of Laravel 8 Repository Pattern CRUD implementation essentials.

## Laravel 8 Repository Pattern using

- [x] Form requests <br>
- [x] Request validation <br>
- [x] Responses / API Resources <br>
- [x] Eloquent Relationship <br>
- [x] API Resources (Collections) <br>
- [x] Observer <br>
- [x] Events + Listener <br>
- [x] Unit Tests <br>
- [x] HTTP Tests (EventsApiTest)

Nice To Have:

- Service Container 
- FE (React|Vue soon)

## Install with Composer

```
    $ composer install
```

## Set Environment

```
    $ cp .env.example .env
```

#### Note: Don't forget to set your db settings

## Set the application key

```
   $ php artisan key:generate
```

## Run migrations and seeds

```
   $ php artisan migrate --seed
```

## To execute

#### Event

```
    Create - POST - {localhost}/api/events?eventName={eventName}&location={location}&date={date}
    Read - GET (all)- {localhost}api/events
    GET (byID) - {localhost}/api/events/{id}
    Update - PUT - {localhost}/api/events/{id}?eventName={updatedEventName}&locations={updatedLocation}&date={updatedDate}
    Delete - DELETE - {localhost}/api/events/{id}
```

#### Event Comment

```
    Create - POST - {localhost}/api/events{event_id}/comments?body={body}
    Read - GET (all)- {localhost}api/events{event_id}/comments
    Update - PUT - {localhost}/api/events{event_id}/{comment_id}?body={updated_body}
    Delete - DELETE - {localhost}/api/events{event_id}/comments/{comment_id}
```

#### Medal

```
    Create - POST - {localhost}/api/medals?event_id={event_id}&category={category}&image={image}
    Read - GET (all)- {localhost}api/medals
    GET (byID) - {localhost}/api/medals/{id}
    Update - PUT - {localhost}/api/medals/{id}?event_id={updatedEvent_id}&category={updatedCategory}&image={updatedImage}
    Delete - DELETE - {localhost}/api/medals/{id}
```

#### Medal Comment

```
    Create - POST - {localhost}/api/medals{medal_id}/comments?body={body}
    Read - GET (all)- {localhost}api/medals{medal_id}/comments
    Update - PUT - {localhost}/api/medals{medal_id}/comments/{comment_id}?body={updated_body}
    Delete - DELETE - {localhost}/api/medals{medal_id}/comments/{comment_id}
```

## To  test

```
   $ php artisan test
```
