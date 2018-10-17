<reply :attributes="{{ $reply }}" inline-template v-cloak>
    <div id="reply-{{ $reply->id }}" class="card mb-3">
        <div class="card-header">
            <div class="level">
                <h5 class="flex">
                <a href="{{ route('profiles', $reply->owner) }}">
                        {{ $reply->owner->username }}
                    </a> said {{ $reply->created_at->diffForHumans() }}
                </h5>
                @if (Auth::check())
                    <div>
                        <favorite :reply="{{ $reply }}"></favorite>
                    </div>
                @endif
            </div>
        </div>
        <div class="card-body">
            <div v-if="editing">
                <div class="form-group">
                    <textarea class="form-control" v-model="body"></textarea>
                </div>
                <button class="btn btn-sm btn-outline-primary" @click="update">Update</button>
                <button class="btn btn-sm btn-link" @click="editing = false">Cancel</button>
            </div>
            <div v-else="editing" v-text="body"></div>
        </div>

        @can('update', $reply)
            <div class="card-footer level">
                <button class="btn btn-outline-secondary btn-sm mr-1" @click="editing = true">Edit</button>
                <button class="btn btn-sm btn-danger mr-1" @click="destroy">Delete</button>
            </div>
        @endcan
    </div>
</reply>

