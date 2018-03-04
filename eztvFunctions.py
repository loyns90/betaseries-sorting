#!/usr/bin/python3

def tv_show(self, name):
        """
            Fetches a show mapping $name returns a $self instance.
            Might raise a TVShowNotFound exception
        """
        # all strings are in lowercase
        name = name.lower()
        data = {
            'SearchString': '',
            'SearchString1': name,
            'search': 'search'
        }

        req = requests.post(URL + "/search/", data=data, timeout=5)
        self.content = requests.get(req.url, timeout=5).content

        # load the tv show data
        self.load_tv_show_data()
        return self._instance
