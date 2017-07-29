# Pico-LongPage

This plugin enables you to have a nested list of navigation items, currently based on `<h2>`s, or `##` in your markdown.

## Example

Inside your markdown file in your Pico project's `content` folder:
```markdown
---
Title: My Page
IsLongPage: true
---

# My Page

## Section 1

No nam cibo eius aeque. Tota tamquam consequuntur eam et, at justo legendos quo. Ne omnes admodum constituto quo. In solet omnium eloquentiam has, oratio accusata disputando sed at. No nonumy definitiones sea.

## Section 2

- No nam cibo eius aeque.
- Tota tamquam consequuntur eam et, at justo legendos quo.
```

Your `index.twig` file, probably in your navigation section:
```html
<nav>
    <ul>
        {% for page in pages if page.title %}
            <li class="{% if page.id == current_page.id %}active{% endif %}">
                <a href="{{ page.url }}">{{ page.title }}</a>
                {% if meta.islongpage and page.id == current_page.id %}
                    <ul>
                        {% for header in meta.headers %}
                            <li><a href="#{{ header.id }}">{{ header.header }}</a></li>
                        {% endfor %}
                    </ul>
                {% endif %}
            </li>
        {% endfor %}
    </ul>
</nav>
```

## Installation

1. Copy `LongPage.php` into your Pico installation's `"`plugins`"` folder
2. Add `IsLongPage: true` to the meta section on any page you want to use this plugin on. See the Example section above.
3. Add markup to your `index.twig`, see the Example section above.
4. Success
