# Photo editing commands

Photo editing commands that I was missing in my life.

## Recusion

`php application recurse {source} {x} {y} {width} {height} {--recursion=6} {--out=}`
<br>
<br>
Recursively paste a photo in itself.

* source: The photo file path / url.
* x: The X coordinate at which the photo must be placed in itself.
* y: The Y coordinate at which the photo must be placed in itself.
* width: The width of the photo placed inside.
* height: The height of the photo placed inside.
* recursion: The number of times the photo is pasted in itself. Default is 6.
* out: The final result's output location. Default is as `out.png` at the base path.
