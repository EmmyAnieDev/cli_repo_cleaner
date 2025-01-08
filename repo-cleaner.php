<?php

function deleteOldBranches($repoPath) {

    $threeMonths = strtotime('-3 months');

    // Get all branches with their last commit dates
    $command = 'git -C ' . escapeshellarg($repoPath) . ' for-each-ref --format="%(refname:short) %(authordate:unix)" refs/heads/';
    $branchesOutput = shell_exec($command);
    $branches = explode("\n", trim($branchesOutput));

    foreach ($branches as $branch) {
        if (empty($branch)) continue;

        list($branchName, $lastCommitTime) = explode(' ', $branch);

        // Check if the branch is older than 3 months
        if ((int)$lastCommitTime < $threeMonths) {
            $deleteCommand = "git -C " . escapeshellarg($repoPath) . " branch -D " . escapeshellarg($branchName);
            shell_exec($deleteCommand);
            echo "Deleted branch: $branchName\n";
        }
    }
}

function deleteOrphanCommits($repoPath) {
    $gcCommand = 'git -C ' . escapeshellarg($repoPath) . ' gc --prune=now --aggressive';
    $output = shell_exec($gcCommand);
    echo "deleted orphaned commit Output:\n$output\n";
}

$repoPath = $argv[1];
deleteOldBranches($repoPath);
deleteOrphanCommits($repoPath);