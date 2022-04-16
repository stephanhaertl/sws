<?php

class CommentPage extends Kirby\Cms\Page
{
    public function changeSlug(string $slug, string $languageCode = null)
    {
        // always sanitize the slug
        $slug = Str::slug($slug);


        $data['slug'] = $slug;

        if ($comment = Db::first('comments', '*', ['slug' => $this->slug()])) {
            if (Db::update('comments', $data, ['slug' => $this->slug()])) {
                return $this;
            };
        } 
        return $this;
    }

    protected function changeStatusToDraft()
    {
        $data['status'] = 'null';

        if ($comment = Db::first('comments', '*', ['slug' => $this->slug()])) {
            return Db::update('comments', $data, ['slug' => $this->slug()]);
        }

        return $this;
    }

    protected function changeStatusToListed(int $position = null)
    {
        // create a sorting number for the page
        $num = $this->createNum($position);

        // don't sort if not necessary
        if ($this->status() === 'listed' && $num === $this->num()) {
            return $this;
        }

        $data['status'] = 'listed';

        if ($comment = Db::first('comments', '*', ['slug' => $this->slug()])) {
            return Db::update('comments', $data, ['slug' => $this->slug()]);
        }

        if ($this->blueprint()->num() === 'default') {
            $this->resortSiblingsAfterListing($num);
        }

        return $this;
    }

    protected function changeStatusToUnlisted()
    {
        if ($this->status() === 'unlisted') {
            return $this;
        }

        $data['status'] = 'unlisted';

        if ($comment = Db::first('comments', '*', ['slug' => $this->slug()])) {
            return Db::update('comments', $data, ['slug' => $this->slug()]);
        }

        $this->resortSiblingsAfterUnlisting();

        return $this;
    }

    public function changeTitle(string $title, string $languageCode = null)
    {
        $data['title'] = $title;

        if ($comment = Db::first('comments', '*', ['slug' => $this->slug()])) {
            if (Db::update('comments', $data, ['slug' => $this->slug()])) {
                return $this;
            };
        } 
        return $this;
    }

    public function delete(bool $force = false): bool
    {
        return Db::delete('comments', ['slug' => $this->slug()]);
    }

    public function isDraft(): bool
    {
        return in_array($this->content()->status(), ['listed', 'unlisted']) === false;
    }

    public function writeContent(array $data, string $languageCode = null): bool
    {
        unset($data['title']);

        if ($comment = Db::first('comments', '*', ['slug' => $this->slug()])) {
            return Db::update('comments', $data, ['slug' => $this->slug()]);
        } else {
            $data['slug'] = $this->slug();            

            return Db::insert('comments', [
                'title'  => $data['title'] ?? $this->slug(),
                'slug'   => $this->slug(),
                'text'   => $data['text'],
                'user'   => $data['user'],
                'status' => is_null($data['status']) ? 'draft' : $data['status']
              ]);
        }

    }

}