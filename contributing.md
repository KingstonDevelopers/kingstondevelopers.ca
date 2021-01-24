## Contributing

### Code Style Guidelines
#### CSS
When naming classes, use the [Block Element Modifier - BEM](https://en.bem.info/methodology/) methodology to keep components scalable and easy to target within Sass files.

#### Sass
All page styling should occur in Sass partials found in the `resources/assets/sass` directory. If creating a new Sass partial, make sure to import it inside of `app.scss` (found in the `sass` directory).

#### HTML
Classes should be the first attribute to appear in elements.
```
<!-- Good -->
<div class="event" v-for="meetup in upcomingMeetups">

<!-- Bad -->
<div v-for="meetup in upcomingMeetups" class="event">
```

### Git Guidelines
#### Commit and Pull Request Messages
Present tense should be used when describing a commit or pull request.

#### Issues
If your PR fixes and issue make sure to write `Fixes #__` in the PR comment (where `__` after the `#` is the number representing the issue being fixed).