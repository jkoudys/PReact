<?php
namespace Qaribou\Preact;

abstract class Component
{
    protected $state = [];
    protected $props = [];
    protected $displayName;

    public function __construct(array $props = null)
    {
        if ($props) {
            $this->props = array_merge($this->props, $props);
        }
    }

    protected function setState(array $state = null)
    {
        if ($state) {
            $this->state = array_merge($this-state, $state);
        }
    }

    public function componentWillMount()
    {
        // TODO
    }

    public function componentDidMount()
    {
        // TODO
    }

    public function shouldComponentUpdate(): bool
    {
        // TODO
        return false;
    }

    public function componentWillUpdate()
    {
        // TODO
    }

    public function componentDidUpdate()
    {
        // TODO
    }

    public function componentWillUnmount()
    {
        // TODO
    }

    public function __toString(): string
    {
        // TODO: just assuming everything mounts and renders to a string once.
        // Eventually we'll want to be able to build and manage a state, but for
        // now we're just doing simple string rendering. Just run through the
        // whole lifecycle all at once.
        if ($this->shouldComponentUpdate) {
            $this->componentWillUpdate();
        } else {
            $this->componentWillMount();
        }

        $rendered = $this->render();

        if ($this->shouldComponentUpdate) {
            $this->componentDidUpdate();
        } else {
            $this->componentDidMount();
        }

        $this->componentWillUnmount();

        return $rendered;
    }

    /**
     * Render the component.
     * All components must have a rendered result. Most Components
     * will have the bulk of their code in here.
     * @return string
     */
    abstract public function render(): string;
}
