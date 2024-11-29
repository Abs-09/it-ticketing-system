<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.5;
        }

        .container {
            width: 100%;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
            padding-bottom: 10px;
        }

        .header h2 {
            font-size: 18px;
            margin: 0;
        }

        .label {
            font-weight: bold;
            color: #555;
        }

        .value {
            color: #333;
        }

        .ticket-info {
            margin-bottom: 20px;
        }

        .ticket-info dl {
            margin: 0;
        }

        .ticket-info dt {
            display: inline-block;
            width: 150px;
            font-weight: bold;
        }

        .ticket-info dd {
            display: inline-block;
            margin: 0 0 10px 0;
        }

        .attachments {
            margin-top: 20px;
        }

        .attachments h3 {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .attachment-list {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }

        .attachment-list li {
            margin-bottom: 5px;
        }

        .comments {
            margin-top: 20px;
        }

        .comments h3 {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .comment-item {
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }

        .comment-item:last-child {
            border-bottom: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h2>Ticket Number: #{{ $ticket->id }}</h2>
            <p class="label">Priority: 
                <span class="value">{{ ucfirst($ticket->priority) }}</span>
            </p>
            <p class="label">Status: 
                <span class="value">{{ ucfirst(str_replace('_', ' ', $ticket->status)) }}</span>
            </p>
        </div>

        <!-- Ticket Info -->
        <div class="ticket-info">
            <dl>
                <dt>Title:</dt>
                <dd>{{ $ticket->title }}</dd>
            </dl>
            <dl>
                <dt>Details:</dt>
                <dd>{{ $ticket->description }}</dd>
            </dl>
            <dl>
                <dt>Type:</dt>
                <dd>{{ $ticket->category?->name }}</dd>
            </dl>
            <dl>
                <dt>Requested by:</dt>
                <dd>{{ $ticket->createdby?->name }}</dd>
            </dl>
            <dl>
                <dt>Assigned to:</dt>
                <dd>{{ $ticket->assignedto?->name ?? 'Unassigned' }}</dd>
            </dl>
            <dl>
                <dt>Created Date:</dt>
                <dd>{{ $ticket->created_at }}</dd>
            </dl>
            <dl>
                <dt>Assigned Date:</dt>
                <dd>{{ $ticket->assigned_at }}</dd>
            </dl>
            <dl>
                <dt>Resolved At:</dt>
                <dd>{{ $ticket->resolved_at }}</dd>
            </dl>
            <dl>
                <dt>Closed At:</dt>
                <dd>{{ $ticket->closed_at }}</dd>
            </dl>
        </div>

        <!-- Attachments -->
        <div class="attachments">
            <h3>Attached Files</h3>
            @if ($attachments->isEmpty())
                <p>No Files Attached for this Ticket</p>
            @else
                <ul class="attachment-list">
                    @foreach ($attachments as $attachment)
                        <li>{{ $attachment->file_name }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <!-- Comments -->
        <div class="comments">
            <h3>Comments</h3>
            @if ($comments->isEmpty())
                <p>No comments yet.</p>
            @else
                @foreach ($comments as $comment)
                    <div class="comment-item">
                        <p><strong>{{ $comment->user->name }}</strong> ({{ $comment->created_at }}):</p>
                        <p>{{ $comment->comment }}</p>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</body>
</html>
