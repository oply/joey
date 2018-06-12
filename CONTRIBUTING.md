The following is a set of guidelines for contributing to Joey. These are mostly guidelines, not rules. Use your best judgment and feel free to propose changes to this document in a pull request.

## How can I contribute ?

### Reporting bugs

Before creating bug reports, please check this list as you might find out that you don’t need to create one. When you are creating a bug report, please include as many details as possible.

Do not use the issue tracker for personal support requests, and do not derail or troll issues. Keep the discussion on topic and respect the opinions of others.

* Use a clear and descriptive title for the issue to identify the problem
* Describe the steps which reproduce the problem
* Describe the current behavior, et the expected behavior
* Specify which Joey version you are using
* Specify which OS and which OS version you are using

Your first code contribution? Start looking at `beginner` or `help wanted` issue.

## Contribution process

* Basic understanding of Git and GitHub
* Create a branch for the changes

Each pull request (PR) should address one issue at a time.

### Pull requests

* Do not include issue number in the PR title
* End all files with a new line

#### Some useful conventions

* Place requires and imports in the following order :
    * External librairies such as `import React from "react"`
    * Internal tools and utils `import { color } from "const"`
    * Internal components imports `import Header from "components/organisms"`

* Our naming conventions
    * Files are kebab case `my-file.js`
    * Classes are pascal case `MyClass`
    * Constants are snake case `MY_SUPER_CONSTANTS`
    * Functions are camel case `mySuperFunction()`

The other small coding conventions are handled by **Prettier and Eslint**.

**Have fun!** 🎈