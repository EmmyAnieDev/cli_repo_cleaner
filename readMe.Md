# Git Cleaner

Git Cleaner is a CLI tool designed to clean up old branches and orphan commits in a Git repository. It helps you keep your repositories optimized by removing unused branches and unreachable objects.

## Features

- Deletes branches that haven't been updated in the last 3 months (default setting).
- Removes orphan commits and unreachable objects by running Git's garbage collection.
- Optimizes repository size by repacking and pruning unnecessary objects.

## Prerequisites

- PHP installed on your system.
- Git installed and accessible via the command line.

## Installation

Clone the repository to your local machine:

git clone https://github.com/your-username/old-project.git
cd old-project

## Usage

To clean up a Git repository, run the following command:

php repo-cleaner.php <path-to-your-repo>

### Example:

php repo-cleaner.php ~/StudioProjects/old-project

### What Happens:

1. Branches older than 3 months are deleted.
2. Orphan commits and unreachable objects are removed using Git's garbage collection.

## Examples

### Delete Old Branches and Orphan Commits:

php repo-cleaner.php /path/to/local/repository

### Verify Cleanup:

After running the script, you can verify the repository state:

1. **Check remaining branches**:
   git branch
2. **Check for orphan commits**:
   git fsck --unreachable
3. **Check `.git` folder size**:
   du -sh .git

## Configuration

You can customize the time threshold for deleting branches by modifying the script. To change the default 3 months threshold, update this line in the script:

$threeMonths = strtotime('-3 months');

For example, to delete branches older than 6 months:
$threeMonths = strtotime('-6 months');

## Development

This tool is lightweight and doesn't require additional dependencies. Simply clone and run the script in your PHP environment.

## Contributing

Bug reports and pull requests are welcome on GitHub at https://github.com/EmmyAnieDev/cli_repo_cleaner.

## Todo

- Add a dry-run mode to preview branches and commits that would be deleted.
- Add support for remote repository cleanup (requires cloning first).
- Enhance logging for better troubleshooting and transparency.

## License

Git Cleaner is open-source software Contributions are welcome!
